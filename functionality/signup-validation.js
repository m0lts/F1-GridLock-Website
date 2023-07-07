const validator = new JustValidate("#signup");

validator
    .addField("#username", [
    {
        rule: 'required',
    },
    {
        validator: (value) => () => {
            return fetch("validate-username.php?username=" + 
            encodeURIComponent(value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(json) {
                        return json.available_username;
                    });
        },
        errorMessage: "Username already taken."
    },
    {
        rule: 'maxLength',
        value: 25,
    }
    ])
    .addField("#first_name", [
    {
        rule: 'required',
    }
    ])
  .addField("#second_name", [
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

