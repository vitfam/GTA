-- All the queries from different files, used in this application have been curated into this single file

-- accessories\_checking.php

SELECT exists(Select transaction_type from history WHERE mod(transaction_type,4)=0 and user_id = :u and car_id = :c) AS bought

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u AND mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

--accessories\_chooseModal.php

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

--accessories\_modifyCar.php

SELECT * FROM accessories WHERE accessory_id = :a

--accessories\_roundAccess.php

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

--admin\inisde\_detailModal.php

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :ui and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND mod(transaction_type,2)=1) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

-- admin\leaderboard.php

SELECT t3.user_id as PlayerID, t3.name as PlayerName, t3.amount as LeftBalance, t3.stars as Stars, t3.stars/(t5.spent) as ratio, count(t3.car_id) as Stock, count(distinct t4.type) as types, t5.spent from (select users.user_id, users.name, users.amount, users.stars, t2.car_id from users left join (select history.user_id, history.car_id from history, (Select max(transaction_id) as latest_transaction from history where mod(transaction_type,4)<>0 group by car_id) t1 where t1.latest_transaction = history.transaction_id and transaction_type in (1,3,5,7)) t2 on users.user_id = t2.user_id) t3, (select cars.car_id, model.model_id, car_type.type from cars, model, car_type where cars.model_id = model.model_id and model.type = car_type.type) t4, (select sum(model.price) as spent, history.user_id from history, cars, model where history.car_id = cars.car_id and cars.model_id = model.model_id and history.transaction_type in (1,5) group by history.user_id) t5 where t5.user_id = t3.user_id and t3.car_id = t4.car_id group by t3.user_id order BY types DESC, ratio DESC, stars desc, LeftBalance DESC, Stock desc

-- components\bonus.php

UPDATE users INNER JOIN (select sum(cars.current_price) as sp, sum(cars.current_stars) as ss, users.user_id from history, cars, users, (select max(transaction_id) as last_transaction from history group by car_id) t1 where history.transaction_id = t1.last_transaction AND history.transaction_type = 2 AND users.user_id = history.user_id AND cars.car_id = history.car_id group by history.user_id) t2 ON users.user_id = t2.user_id SET users.amount = users.amount-sp, users.stars = users.stars+ss

INSERT INTO history (user_id, car_id, transaction_type) select history.user_id, history.car_id, 7 from history, (select max(transaction_id) as latest_transaction from  history group by car_id) t1 where history.transaction_id = t1.latest_transaction and history.transaction_type = 2

-- components\_starUpdate.php

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3, 5, 7)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

-- components\_depreciation.php

UPDATE cars INNER JOIN (SELECT cars.current_price, cars.current_stars, cars.car_id, model.model_name, model.type, cars.current_price-(car_type.depreciation*0.01*model.price) as reducedp, cars.current_stars-(car_type.depreciation*0.01*model.stars) as reduceds from cars, model, car_type, (select history.car_id from history, (select max(transaction_id) as last_transaction, car_id from history where mod(transaction_type,4)<>0 group by car_id) t1 where history.transaction_id = t1.last_transaction AND transaction_type in (1,3,7)) t2 WHERE t2.car_id = cars.car_id AND cars.model_id = model.model_id AND model.type = car_type.type) b2 ON cars.car_id = b2.car_id SET cars.current_price = b2.reducedp, cars.current_stars = b2.reduceds

-- leaderboard.php

SELECT t3.user_id as PlayerID, t3.name as PlayerName, t3.amount as LeftBalance, t3.stars as Stars, t3.stars/(t5.spent) as ratio, count(t3.car_id) as Stock, count(distinct t4.type) as types, t5.spent from (select users.user_id, users.name, users.amount, users.stars, t2.car_id from users left join (select history.user_id, history.car_id from history, (Select max(transaction_id) as latest_transaction from history where mod(transaction_type,4)<>0 group by car_id) t1 where t1.latest_transaction = history.transaction_id and transaction_type in (1,3,5,7)) t2 on users.user_id = t2.user_id) t3, (select cars.car_id, model.model_id, car_type.type from cars, model, car_type where cars.model_id = model.model_id and model.type = car_type.type) t4, (select sum(model.price) as spent, history.user_id from history, cars, model where history.car_id = cars.car_id and cars.model_id = model.model_id and history.transaction_type in (1,5) group by history.user_id) t5 where t5.user_id = t3.user_id and t3.car_id = t4.car_id group by t3.user_id order BY types DESC, stars desc, LeftBalance DESC, Stock desc

-- dealer\_roundSell.php

SELECT * FROM cars, model, (SELECT history.car_id FROM history, (SELECT MAX(transaction_id) AS required_id FROM history WHERE user_id = :u and mod(transaction_type,4) <> 0 GROUP BY car_id) t1 WHERE t1.required_id = history.transaction_id AND transaction_type IN (1, 3)) t2 WHERE cars.car_id = t2.car_id AND model.model_id = cars.model_id

-- dealer\_check.php

SELECT COUNT(car_id) AS stock, car_id FROM cars where model_id = :m GROUP BY model_id

SELECT * FROM history WHERE car_id = :c AND user_id = :u AND mod(transaction_type,4)<>0 ORDER BY transaction_id DESC LIMIT 1

-- sale\_is_sale.php

SELECT COUNT(car_id) AS stock, car_id FROM cars where model_id = :m GROUP BY model_id

SELECT * FROM history WHERE car_id = :c AND user_id = :u ORDER BY transaction_id DESC LIMIT 1