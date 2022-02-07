import { eventEnd } from "./time.js";

// clock
setInterval(() => {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();

  let ap = h >= 12 ? "PM" : "AM";
  h = h % 12;
  h = h ? h : 12;
  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  document.getElementById("clock").innerHTML = `${h} : ${m} : ${s} ${ap}`;
}, 1000);

// Event end timer
setInterval(() => {
  var now = new Date().getTime();
  var eventEndRemainingTime = eventEnd.getTime() - now;

  var hrs = Math.floor(
    (eventEndRemainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  var mins = Math.floor(
    (eventEndRemainingTime % (1000 * 60 * 60)) / (1000 * 60)
  );
  var s = Math.floor((eventEndRemainingTime % (1000 * 60)) / 1000);

  hrs = hrs < 10 ? `0${hrs}` : hrs;
  mins = mins < 10 ? `0${mins}` : mins;
  s = s < 10 ? `0${s}` : s;

  if (eventEndRemainingTime > 0) {
    document.getElementById("time-left").innerHTML = `${hrs} : ${mins} : ${s} LEFT`;
    if (eventEndRemainingTime < 5 * 60 * 1000) {
      document.getElementById("time-left").style.color = "red";
    } else{
      document.getElementById("time-left").style.color = "yellow";
    }
  } else {
    document.getElementById("time-left").style.color = "red";
    document.getElementById("time-left").innerHTML = `EVENT ENDED`;
  }
}, 1000);