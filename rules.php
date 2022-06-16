<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}
require "./components/_dbconn.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php require "./components/_header_links.php"; ?>
    <title>GUIDELINES | GTA 2.0</title>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, .85), rgba(0, 0, 0, .85)), url('https://images.unsplash.com/photo-1552176625-e47ff529b595?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80');">
    <?php require "./components/_navbar.php"; ?>

    <div class="container rules my-5 text-light">
        <h1 class="text-center mb-3 text-uppercase text-info">Guidelines</h1>
        <h4>General Instructions</h4>
        <ul>
            <li><a class="text-warning imp" href="./login.php">Login</a> with your credentials which will be provided in a meeting.</li>
            <li>The game will start at <span class="imp">04:00 PM</span>.</li>
            <li>For <span class="imp">duo participants</span>, Only team leaders will be able to purchase, upgrade and sell the cars (take part in the game using main credentials). The other team member can only view the operations going on using view credentials of the main account. All the information regarding this will be given at 4 pm, 06-02-22.</li>
            <li>The game must be played on a single device with a reliable connection (ideally a Laptop/Desktop).</li>
            <li>Please ensure that every participant has a smooth and seamless internet connection. Any problems due to internet issues on the participants end during event time will not be entertained.</li>
            <li>Participants must refrain from using inappropriate language in the group chats, group meetings, and personal chats to organising members. Violation of which may lead to disqualification.</li>
            <li>To avoid login issues, do not log out before the game's permitted time has expired.</li>
            <li class="text-uppercase text-info fw-bold">In any and all situations, VITFAM's judgement is final and binding.</li>
        </ul>

        <h4 class="mt-5">Disqualification</h4>
        <ul>
            <li>Using any foul means during or before the game.</li>
            <li>If a player <span class="error">does not own at least one car from every category</span> (SUV, HATCHBACK, SEDAN, SPORT, VINTAGE) at the end of the entire game, they will be disqualified.</li>
            <li>At the end of the bonus round, in the leaderboard, the <span class="error">RED</span> colour of the rank number would depict that the player is not qualified for the results.</li>
            <li>If the <span class="error">balance is negative</span> at the end of 5 rounds, meaning the player is in debt, then they will be disqualified from the event.</li>
            <li>Violation of any <span class="error">guidelines</span> will lead to disqualification.</li>
        </ul>

        <h4 class="mt-5">Winning Criteria</h4>
        <ul>
            <li>Participants <span class="imp">must own at least one car from every category</span> (SUV, HATCHBACK, SEDAN, SPORT, VINTAGE) at the end of the entire game.</li>
            <li>The rankings on the leaderboard will be based on your star ratings. </li>
            <li>However, the winning criteria will be based on the number of stars at the end of the game, amount left and the number of cars owned by you at the end of the game and so on.</li>
            <li>If all the above points are met without any disqualification.</li>
        </ul>

        <?php
            if ($_SESSION['user'] == 0){
                echo "
                <h4 class='mt-4'>Accessing the Credentials</h4>
                <ul>
                    <li>Visit the <a class='text-warning imp' href='./credentials.php'>Credentials</a> page after 04:15 PM.</li>
                    <li>Enter the code there to get the credentials to access the website.</li>
                    <li>The format of the code is, the username of email, '@' and the last 4-digits of the whatsapp number which they registered while filling the form.</li>
                    <li>For team members, use the email of your team leader and your WhatsApp number.</li>
                    <li>Example : <br/>
                    Registered Mail - abc@gmail.com <br/>
                    Registered WhatsApp Number - 9876543210 <br/>
                    Code - <span class='imp'>abc@3210</span>
                    </li>
                    <li>Note the <span class='imp'>DISPLAYED</span> credentials and login to the website.</li>
                </ul>
                ";
            } else {
                echo "
                <h4 class='mt-4'>Game Play</h4>
                <ul>
                    <li>At the start of the game, the in game amount allotted to every user is <span class='imp'>2,50,000</span>.</li>
                    <li>Once you login and timer begins, a catalogue i.e. list of all the cars will be shown and you will have 4 minutes to check everything and make the budget according to it.</li>
                    <li>Afterwards, round 1 will start, it's a total of 6 minutes, 2 minutes per section in this order: </li>
                    <ul>
                        <li>Buy first hand cars.</li>
                        <li>Modify the rating of the cars in your inventory by adding accessories to them.</li>
                        <li>List the car for selling to the other participants / Buy listed cars from other participants.</li>
                        <li>This is the end of one round.</li>
                    </ul>
                    <li>Once one round of 6 minutes as mentioned above is over, a break of 2 mins will be given and then the next round will start.</li>
                    <li>There are 5 such rounds, namely SUV, HATCHBACK, SEDAN, SPORT, VINTAGE in this order, with all the above mentioned 3 sections each. After these 5 rounds, there is one bonus round, contents of which are <span class='imp'>top secret, but only for 1 minute</span>.</li>
                    <li>The complete game will be of <span class='imp'>45 minutes</span> (Catalogue for 4 minutes, 5 Rounds for 6 minutes each, 5 breaks for 2 minutes each and a bonus round of 1 minute).</li>
                    <li>You can also access the leaderboard at any time, columns for which are - rank, player name, account stars, remaining budget, number of cars in inventory. <span class='imp'>Rank in leaderboard is not final rank, read winning criteria to know more</span>. The Colour of rank number will turn green at the end of round 5 only for those who have qualified for a chance at winning.</li>
                </ul>
                
                <h5 class='mt-4'>Buy first hand car section rules:</h5>
                <ul>
                    <li>Every  car has a limit in quantity = 3.</li>
                    <li>No account is allowed to purchase the same car twice in this section only.</li>
                </ul>

                <h5 class='mt-4'>Modification using accessories section rules:</h5>
                <ul>
                    <li>Every main account (Not viewer account) can modify a particular car in their inventory with a specific accessory only once.</li>
                    <li>Quantity of each accessory = 5.</li>
                </ul>

                <h5 class='mt-4'>Listing inventory cars / Buying listed cars section rules:</h5>
                <ul>
                    <li>You must enter the price of the car that you wish to sell in the <span class='imp'>Your Value</span> text box. Please note that the <span class='imp'>current value</span>(depreciated value of the car) will be visible on your screen. </li>
                    <li>If successfully listed then your account will be credited with the value you entered and stars of the cars will be deducted from your account.</li>
                    <li>The maximum value that you can list your car for is <span class='imp'>20%</span> more than the current value of the car. No lower limit.</li>
                    <li class='imp'>If your listed car is unsold till the end of round 5, then after round 5, the unsold cars will be returned to the owners and the listed price of the car will be deducted from remaining balance and the star rating of the car added to the account.</li>
                    <li>Please note that the value of the listed cars will not depreciate in this section unless they are in a player account's inventory.</li>
                    <li>When the balance is cleared after all listed cars have been returned, the budget remaining in player accounts are allowed to enter a negative value.</li>
                </ul>
                
                <h5 class='mt-4'>Price range of cars</h5>
                <div class='m-auto container w-50'>
                    <table class='table table-responsive text-light text-center'>
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Car Type</th>
                                <th>Minimum Range</th>
                                <th>Maximum Range</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SUV</td>
                                <td>21,000</td>
                                <td>66,000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>HATCHBACK</td>
                                <td>2,970</td>
                                <td>22,062</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>SEDAN</td>
                                <td>7,510.5</td>
                                <td>52,500</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>SPORT</td>
                                <td>30,750</td>
                                <td>61,500</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>VINTAGE</td>
                                <td>45,000</td>
                                <td>1,03,500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class='mt-4'>Depreciation or Appreciation of the cars</h5>
                <ul>
                    <li>After every round the <span class='imp'>price and the star value of the cars in player inventories will depreciate</span>.</li>
                    <li>As we all know, vintage cars are valued for their age, thus there will be appreciation rather than depreciation for vintage only.</li>
                    <li>The depreciation/appreciation percentage will increase by <span class='imp'>2%</span> after each round.</li>
                    <li>The percentages for various rounds are shown below.</li>
                </ul>
                <div class='m-auto container w-50'>
                    <table class='table table-responsive text-light text-center'>
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Car Type</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SUV</td>
                                <td>5% (depreciation)</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>HATCHBACK</td>
                                <td>10% (depreciation)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>SEDAN</td>
                                <td>15% (depreciation)</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>SPORT</td>
                                <td>20% (depreciation)</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>VINTAGE</td>
                                <td>12% (appreciation)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                ";
            }
        ?>
        <p class="text-center mt-5 fs-5">Make use of your imagination and create a fantastic budget. We're confident that you'll be able to take advantage of every opportunity.</p>
        <p class="text-uppercase text-center fw-bold text-warning fs-4 mt-4">All the best to you!</p>
    </div>

    <?php require "./components/_footer.php"; ?>
    <script src="./js/main.js"></script>
</body>

</html>