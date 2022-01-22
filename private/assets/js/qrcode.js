const href = "http://31.32.63.95/Grand_Angle/Grand_Angle/index.php?v";
const size = 300;

new QRCode(document.querySelector("#qrcode"), {
text: href,
width: size,
height: size,

colorDark: "#000014",
colorLight: "#0099ff"
});