import { eventTime, eventEnd } from "./time.js";

let starting = document.getElementById("starting");
starting.style.display = "none";

let started = document.getElementById("started");
started.style.display = "none";

let end = document.getElementById("ended");
end.style.display = "none";

setInterval(() => {
  var now = new Date().getTime();

  var remainingTime = eventTime.getTime() - now;
  var eventTiming = eventEnd.getTime() - now;

  var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
  var hours = Math.floor(
    (remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

  days = days < 10 ? `0${days}` : days;
  hours = hours < 10 ? `0${hours}` : hours;
  minutes = minutes < 10 ? `0${minutes}` : minutes;
  seconds = seconds < 10 ? `0${seconds}` : seconds;

  if (remainingTime > 0) {
    starting.style.display = "block";
    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;
  } else if (remainingTime < 0 && eventTiming > 0) {
    starting.style.display = "none";
    started.style.display = "block";
    document.getElementById("ready_music").pause();
    document.getElementById("ready").style.display = "none";
  } else {
    starting.style.display = "none";
    started.style.display = "none";
    document.getElementById("ready").style.display = "none";
    end.style.display = "block";
  }
  if (remainingTime > 4000 && remainingTime < 5000) {
    ready();
  }
  if (remainingTime > 9000 && remainingTime < 10000) {
    document.getElementById("main_music").pause();
    music_on();
  }
}, 1000);

// MUSIC
const music_on = async () => {
  try {
    await document.getElementById("ready_music").play();
  } catch (err) {
    // console.log(err); // console cleared
  }
};

// READY
const ready = () => {
  document.getElementById("ready").style.opacity = "1";
  var ml4 = {};
  ml4.opacityIn = [0, 1];
  ml4.scaleIn = [0.2, 1];
  ml4.scaleOut = 3;
  ml4.durationIn = 700;
  ml4.durationOut = 500;
  ml4.delay = 400;

  anime
    .timeline({ loop: true })
    .add({
      targets: ".ml4 .letters-1",
      opacity: ml4.opacityIn,
      scale: ml4.scaleIn,
      duration: ml4.durationIn,
    })
    .add({
      targets: ".ml4 .letters-1",
      opacity: 0,
      scale: ml4.scaleOut,
      duration: ml4.durationOut,
      easing: "easeInExpo",
      delay: ml4.delay,
    })
    .add({
      targets: ".ml4 .letters-2",
      opacity: ml4.opacityIn,
      scale: ml4.scaleIn,
      duration: ml4.durationIn,
    })
    .add({
      targets: ".ml4 .letters-2",
      opacity: 0,
      scale: ml4.scaleOut,
      duration: ml4.durationOut,
      easing: "easeInExpo",
      delay: ml4.delay,
    })
    .add({
      targets: ".ml4 .letters-3",
      opacity: ml4.opacityIn,
      scale: ml4.scaleIn,
      duration: ml4.durationIn,
    })
    .add({
      targets: ".ml4 .letters-3",
      opacity: 0,
      scale: ml4.scaleOut,
      duration: ml4.durationOut,
      easing: "easeInExpo",
      delay: ml4.delay,
    })
    .add({
      targets: ".ml4",
      opacity: 0,
      duration: 500,
      delay: 500,
    });
};
