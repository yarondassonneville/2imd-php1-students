// vraag 1
var errors;

var get = function(id)
{
    return document.getElementById(id);
}

function markfield(field, status)
{
    if(status == "ok")
    {
        field.style.border = "1px solid #cccccc";
    }
    else
    {
        field.style.border = "1px solid red";
        errors = true;
    }
}

get("btnSignup").onclick = function(){
    errors = false;

    var naam = get("name");
    var email = get("email");
    var password = get("password");

    if(naam.value == "")
    {
        markfield(naam, "error");
    }
    else
    {
        markfield(naam, "ok");
    }

    if(email.value.indexOf(".") == -1 || email.value.indexOf("@") == -1)
    {
        markfield(email, "error");
    }
    else
    {
        markfield(email, "ok");
    }

    if(password.value.length < 6)
    {
        markfield(password, "error");
    }
    else
    {
        markfield(password, "ok");
    }

    if(!errors)
    {
        get("signup").innerHTML = "<h2>Welcome " + naam.value + "</h2>";
        get("avatar").setAttribute("src", "images/avatar.png");
        get("loginstatus").innerHTML = "Logout";
    }

}


