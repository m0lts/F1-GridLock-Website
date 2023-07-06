const validator = new JustValidate("#signup");

validator
  .addField("#name", [
    {
      rule: 'required',
    }
  ])
  .addField("#email", [
    {
        rule: 'required'
    },
    {
        rule: 'email'
    },
    {
        validator: (value) => () => {
            return fetch("validate-email.php?email=" + 
            encodeURIComponent(value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(json) {
                        return json.available;
                    });
        },
        errorMessage: "Email address already taken."
    }
  ])
  .addField("#password", [
    {
        rule: 'required'
    },
    {
        rule: 'password'
    }
  ])
  .addField("#password_confirmation", [
    {
        validator: (value, fields) => {
            return value === fields["#password"].elem.value;
        },
        errorMessage: "Passwords should match."
    }
  ])
  .onSuccess((event) => {
    document.getElementById("signup").submit();
  })

const validatorTwo = new JustValidate("#predictions");

  validatorTwo
    .addField("p1", [
        {
            rule: 'required',
        },
        {
            validatorTwo: (value) => {
                return value === "???";
            },
            errorMessage: "You must select a driver."
        }
    ])
    .addField("p2", [
        {
            rule: 'required',
        }
    ])
    .addField("p3", [
        {
            rule: 'required',
        }
    ])
    .addField("p4", [
        {
            rule: 'required',
        }
    ])
    .addField("p5", [
        {
            rule: 'required',
        }
    ])
    .addField("p6", [
        {
            rule: 'required',
        }
    ])
    .addField("p7", [
        {
            rule: 'required',
        }
    ])
    .addField("p8", [
        {
            rule: 'required',
        }
    ])
    .addField("p9", [
        {
            rule: 'required',
        }
    ])
    .addField("p10", [
        {
            rule: 'required',
        }
    ])