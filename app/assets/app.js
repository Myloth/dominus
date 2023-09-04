/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)


//import $ from 'jquery' DOESN'T WORK
const $ = require('jquery');

import 'bootstrap';
import 'select2';

import 'bootstrap/dist/css/bootstrap.css';
import './styles/sb-admin-2.css';
import '@fortawesome/fontawesome-free/css/all.css';
import 'select2/src/scss/core.scss';
import Routing from 'fos-router';

const routes = require("../public/js/routes.json");
Routing.setRoutingData(routes);

export default Routing;

// start the Stimulus application
import './controllers/sb-admin-2.js';

$(document).ready(function() {
    $('.select2').select2({});
})