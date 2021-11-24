/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import 'materialize-css/dist/css/materialize.min.css';
import 'materialize-css/dist/js/materialize.min.js';
import 'material-icons';
// start the Stimulus application
import './bootstrap';

/*document.addEventListener('DOMContentLoaded', function() {
    let elemOk = document.getElementById('modal1');
    let elemNo = document.getElementById('modal2');
    let options = {
        "opacity" : "0.5",
        "inDuration" : "250"
    };
    let instanceOk = M.Modal.init(elemOk, options);
    let instanceNo = M.Modal.init(elemNo, options);

    /!*let forma = document.getElementById('register');
    forma.addEventListener('submit', function() {
       alert("papostino");
    });*!/

})*/;


window.onload = function() {
    start();
};

function start() {

    let tooltips = document.querySelectorAll('.tooltipped')
    for (let i = 0; i < tooltips.length; i++){
        M.Tooltip.init(tooltips[i]);
    }

    /*document.addEventListener('DOMContentLoaded', function () {
        let elems = document.querySelectorAll('.tooltipped');
        let instances = M.Tooltip.init(elems, options);
    });*/

}
