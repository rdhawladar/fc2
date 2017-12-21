<style>
.circle-container {
  position: relative;
  /* 1 */
  width: 20em;
  height: 20em;
  padding: 0;
  border-radius: 50%;
  list-style: none;
  /* 2 */
  box-sizing: content-box;
  /* 3 */
  margin: 5em auto 0;
  border: solid 5px tomato;
}
.circle-container > * {
  /* 4 */
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 6em;
  height: 6em;
  margin: -3em;
}
.circle-container > :nth-of-type(1) {
  transform: rotate(0deg) translate(10em) rotate(0deg);
}
.circle-container > :nth-of-type(2) {
  transform: rotate(45deg) translate(10em) rotate(-45deg);
}
.circle-container > :nth-of-type(3) {
  transform: rotate(90deg) translate(10em) rotate(-90deg);
}
.circle-container > :nth-of-type(4) {
  transform: rotate(135deg) translate(10em) rotate(-135deg);
}
.circle-container > :nth-of-type(5) {
  transform: rotate(180deg) translate(10em) rotate(-180deg);
}
.circle-container > :nth-of-type(6) {
  transform: rotate(225deg) translate(10em) rotate(-225deg);
}
.circle-container > :nth-of-type(7) {
  transform: rotate(270deg) translate(10em) rotate(-270deg);
}
.circle-container > :nth-of-type(8) {
  transform: rotate(315deg) translate(10em) rotate(-315deg);
}

.circle-container img {
  display: block;
  width: 100%;
  border-radius: 50%;
  filter: grayscale(100%);
}
.circle-container img:hover {
  filter: grayscale(0);
}

</style>
<ul class='circle-container'>
  <li><img src='http://lorempixel.com/100/100/city' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/nature' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/abstract' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/cats' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/food' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/animals' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/business' alt="..." /></li>
  <li><img src='http://lorempixel.com/100/100/people' alt="..." />
      <ul class='circle-container'>
          <li><img src='http://lorempixel.com/100/100/city' alt="..." /></li>
          <li><img src='http://lorempixel.com/100/100/animals' alt="..." /></li>
          <li><img src='http://lorempixel.com/100/100/animals' alt="..." /></li>
      </ul>
  </li>
</ul>


