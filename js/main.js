// Prevent Right Click
document.addEventListener('contextmenu', event => event.preventDefault());

// Animation for cars
let box = document.getElementsByClassName("car-image");

for (let i = 0; i < box.length; i++) {
  let el = box[i];

//   const height = el.clientHeight;
//   const width = el.clientWidth;
  const height = 200;
  const width = 300;

  el.addEventListener("mousemove", handleMove);

  function handleMove(e) {
    const xVal = e.layerX;
    const yVal = e.layerY;

    const yRotation = 20 * ((xVal - width / 2) / width);
    const xRotation = -20 * ((yVal - height / 2) / height);

    const string = "perspective(500px) scale(1.1) rotateX(" + xRotation + "deg) rotateY(" + yRotation + "deg)";

    el.style.transform = string;
  }

  el.addEventListener("mouseout", function () {
    el.style.transform = "perspective(500px) scale(1) rotateX(0) rotateY(0)";
  });

  el.addEventListener("mousedown", function () {
    el.style.transform = "perspective(500px) scale(0.9) rotateX(0) rotateY(0)";
  });

  el.addEventListener("mouseup", function () {
    el.style.transform = "perspective(500px) scale(1.1) rotateX(0) rotateY(0)";
  });
}
