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
        errorMessage: "Passwords should match"
    }
  ])