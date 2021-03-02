let flag = true;
let imgFlag = false;

function validationFields({ name, value, id }) {
    flag = true;
    let errorMessage = (msg, id) => {
        let input = document.getElementById(id);
        let errorMsg = document.getElementById(`${id}help`);
        input.classList.add("is-invalid");
        errorMsg.innerHTML = msg;

    }
    name = name.trim();
    value = value.trim();
    id = id.trim();
    switch (name) {
        case "firstname":
            if (!value.match(/^[A-Za-z]+$/)) {
                errorMessage("FristName Must Be String With 1 Word!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "middlename":
            if (!value.match(/^[A-Za-z]+$/)) {
                errorMessage("MiddleName Must Be String!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "lastname":
            if (!value.match(/^[A-Za-z]+$/)) {
                errorMessage("LastName Must Be String!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "phonenumber":
            if (!value.match(/^\d{10}$/)) {
                errorMessage("Phone Number Must Be 10 Digits!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "DOB":
            if (!value) {
                errorMessage("Invalid Date", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "adharnumber":
            if (!value.match(/^\d{12}$/)) {
                errorMessage("Adhar Number Must Be 12 Digits!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "address":
            if (value.length <= 10) {
                errorMessage("Address Length not Valid", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "House/Flat No., street and Area Required!";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "city":
            if (!value) {
                errorMessage("Can't Empty", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "state":
            if (!value) {
                errorMessage("Can't Empty", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "country":
            if (!value) {
                errorMessage("Can't Empty", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "ZIP":
            if (!value) {
                errorMessage("Can't Empty", id);
                flag = false;
            } else if (value.length !== 6) {
                errorMessage("Only 6 Digit allow!", id);
                flag = false;
            } else {
                let input = document.getElementById(id);
                document.getElementById(`${id}help`).innerHTML = "";
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            }
            break;
        case "adharimg":
            if (!value) {
                errorMessage("Its Not Image", id);
                flag = false;
            } else if (!value.match(/(\.jpg|\.jpeg|\.png)$/i)) {
                errorMessage("Select Imge Pls", id);
                flag = false;
            } else {
                document.getElementById(`${id}help`).innerHTML = "";
                imgFlag = true;
            }
            break;
        default:
            break;
    }
    console.log(name, value, id);
    return flag
}

async function formSubmit(event) {
    event.preventDefault();
    const target = event.target;
    let flag = true
    $(target).find('input').each((i, e) => {
        if (flag) {
            flag = validationFields(e)
        } else {
            validationFields(e)
        }
    });
    console.log(flag, 'submiting');
    if (flag && imgFlag) {
        const formdata = await new FormData(document.getElementById('userForm'));
        console.log(formdata);
        await $.ajax({
            url: "./../components/editUserProfile.php",
            type: "post",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
            }
        });
    }
}