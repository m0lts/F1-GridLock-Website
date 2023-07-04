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
        validator: async (value) => {
            const response = await fetch("validate-email.php?email=" + encodeURIComponent(value));
            const json = await response.json();
            return json.available;
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