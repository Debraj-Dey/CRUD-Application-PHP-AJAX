document.getElementById('addChangesButton').addEventListener('click', function (event) {
    let form = document.getElementById('myform');

    if (!form.checkValidity()) {
        // Prevent the default form submission if the form is invalid
        event.preventDefault();
        event.stopPropagation();
    } else {
        // Proceed with the form submission via AJAX or any other logic
        addFunction(event);
    }

    // Add Bootstrap validation class to the form
    form.classList.add('was-validated');
}, false);

document.getElementById('updateChangesButton').addEventListener('click', function (event) {
    let form = document.getElementById('myeditform');

    if (!form.checkValidity()) {
        // Prevent the default form submission if the form is invalid
        event.preventDefault();
        event.stopPropagation();
    }
    else {
        // Proceed with the form submission via AJAX or any other logic
        updateFunction(event);
    }

    // Add Bootstrap validation class to the form
    form.classList.add('was-validated');
}, false);


//AJAX call for retriving data

let tbody = document.getElementById("tbody");

function showData() {
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();

    xhr.open("GET", "retrieve.php", true);
    xhr.responseType = "json";

    xhr.onload = () => {
        if (xhr.status === 200) {
            if (xhr.response) {
                x = xhr.response;
            }
            else {
                x = "";
            }
            for (let i = 0; i < x.length; i++) {

                tbody.innerHTML += `<tr>
                    <td> ${x[i].id}</td>
                    <td> ${x[i].Name}</td>
                    <td> ${x[i].Gender}</td>
                    <td> ${x[i].Email}</td>
                    <td> ${x[i].Mobile}</td>
                    <td> ${x[i].Address}</td>
                    <td><button class="operations-btn" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick=edit_data(${x[i].id})>
                    <i class="fa-solid fa-pen-to-square fa-lg" style="color: #000000;" onmouseover="this.style.color='#3d3d3d'" onmouseout="this.style.color='#000000'"></i>
                    </button></td>

                    <td><button type="button" class="operations-btn" data-bs-toggle="tooltip" data-bs-title="Delete" onclick=delete_confirm(${x[i].id})><i class="fa-solid fa-trash fa-lg" style="color: #ff0000;" onmouseover="this.style.color='#d90202'" onmouseout="this.style.color='#ff0000'"></i>
                    </button></td>
                </tr>`
            }
        }
        else {
            console.log("Problem Occured");
        }
    }
    xhr.send();
}

showData();


// ______________________________________________________________________________________________________
//AJAX call for inserting data

// let addChangesButton = document.getElementById("addChangesButton");

// addChangesButton.addEventListener("click", addFunction);

function addFunction(e) {
    e.preventDefault();
    /*  The preventDefault() method cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur.
        For example, this can be useful when:
        Clicking on a "Submit" button, prevent it from submitting a form
        Clicking on a link, prevent the link from following the URL
    */

    //Getting the data inserted by the user
    let name = document.getElementById("username").value;
    let gender = document.getElementById("usergender").value;
    let email = document.getElementById("useremail").value;
    let number = document.getElementById("usernumber").value;
    let address = document.getElementById("useraddress").value;

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "insert.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = () => {
        if (xhr.status === 200) {
            //responseText return a string so JSON.parse() 
            let response = JSON.parse(xhr.responseText);

            let messageDiv = document.getElementById("message");

            messageDiv.innerHTML = `<p class="${response.status}">${response.message}</p>`;

            //Clearing all the input fields
            if (response.status === 'success') {
                // document.getElementById("username").value = '';
                // document.getElementById("useremail").value = '';
                // document.getElementById("usernumber").value = '';
                // document.getElementById("useraddress").value = '';
                document.getElementById("myform").reset();

                // Trigger the click event on the close button so that when after inserting all the data when user clicks on add changes it should close
                showData();
                document.querySelector('#addUserModal .btn-close').click();
            }
        } else {
            console.log("problem occured");
        }
    }
    //Creating a JS object
    const myData = { name: name, gender: gender, email: email, number: number, address: address };
    //Converting JS object to JSON string
    const data = JSON.stringify(myData);

    //Sending the data
    xhr.send(data);
}

// ----------------------------------------------------------------------------------------------------------

//AJAX call for deleting data

function delete_confirm(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        delete_data(id);
    }
}

function delete_data(id) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "delete.php", true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onload = () => {
        if (xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);

            let messageDiv = document.getElementById("message");
            messageDiv.innerHTML = `<p class="${response.status}">${response.message}</p>`;

            showData();

        } else {
            console.log("failed");
        }
    }
    const mydata = { sid: id };
    const data = JSON.stringify(mydata);

    xhr.send(data);
}

//------------------------------------------------------------------------------------------------------------

function edit_data(id) {
    let myeditform = document.getElementById('myeditform');

    let name = myeditform.querySelector("#username");
    let gender = myeditform.querySelector("#usergender");
    let email = myeditform.querySelector("#useremail");
    let mobile = myeditform.querySelector("#usernumber");
    let address = myeditform.querySelector("#useraddress");

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "edit.php", true);
    xhr.responseType = "json";
    xhr.setRequestHeader("Content-type", "application/json");

    //Here in onload data will be fetched from the server
    xhr.onload = () => {

        if (xhr.status === 200) {
            name.value = xhr.response.Name;
            gender.value = xhr.response.Gender;
            email.value = xhr.response.Email;
            mobile.value = xhr.response.Mobile;
            address.value = xhr.response.Address;

            // Add a hidden input field to store the id so that it can be fetched when updating 
            let idField = document.createElement('input');
            idField.type = 'hidden';
            idField.id = 'userId';
            idField.value = xhr.response.id;
            myeditform.appendChild(idField);
        }
        else {
            console.log("Problem Occured");
        }
    }
    const mydata = { sid: id };
    const data = JSON.stringify(mydata);

    xhr.send(data);
}

function updateFunction(e) {

    e.preventDefault();
    let myeditform = document.getElementById('myeditform');

    let id = myeditform.querySelector("#userId").value;

    //Removing the hidden id field because its getting appended evertime we edit, so creating error
    myeditform.querySelector("#userId").remove();

    let name = myeditform.querySelector("#username").value;
    let gender = myeditform.querySelector("#usergender").value;
    let email = myeditform.querySelector("#useremail").value;
    let number = myeditform.querySelector("#usernumber").value;
    let address = myeditform.querySelector("#useraddress").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update.php", true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onload = () => {
        if (xhr.status === 200) {
            response = JSON.parse(xhr.responseText);

            let messageDiv = document.getElementById("message");
            messageDiv.innerHTML = `<p class="${response.status}">${response.message}</p>`;

            showData();
            document.querySelector('#editUserModal .btn-close').click();
        }
        else {
            console.log("Problem occured");
        }
    }
    const myData = { id: id, name: name, gender: gender, email: email, number: number, address: address };
    const data = JSON.stringify(myData);

    xhr.send(data);
}


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));