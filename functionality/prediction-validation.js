const validator = new JustValidate(document.querySelector("#predictions"));

  validator
    .addField(document.querySelector("#p1"), [
        {
            rule: 'required',
        },
        {
            validator: (value) => {
                if (value === "verstappen") {
                    return true;
                } else {
                    return false;
                }
            },
            errorMessage: "You can only select verstappen"
        }
    ])
    .addField(document.querySelector("#p2"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p3"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p4"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p5"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p6"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p7"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p8"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p9"), [
        {
            rule: 'required',
        }
    ])
    .addField(document.querySelector("#p10"), [
        {
            rule: 'required',
        }
    ])
    .onSuccess((event) => {
        document.getElementById("predictions").submit();
      })