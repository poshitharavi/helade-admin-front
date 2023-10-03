import {fetchPost} from './request.js';
import {notification} from "./util.js";

window.onload = function () {

    //form submition
    $('#signInForm').submit(async function () {
        // page auto load stopped
        event.preventDefault();

        // get the text field data
        let email = document.getElementById("email").value;
        let password = document.getElementById("passwordTxt").value;

        //array init
        const data = {
            email: email,
            password: password
        };

        let result = await fetchPost('../services/user-login.php', data);

        if (result.status === 0) {
            if (result.data.status === 1) {
                notification('success','SUCCESS',result.data.message);
                window.location.href = "../index.php";
            } else if (result.data.status === 2) {
                notification('error','ERROR',result.data.message);
            }

        } else {
            notification('error','ERROR','Something went wrong, Please refresh and try again');
            console.error(result.data);
        }

    });
};