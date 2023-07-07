const validator = new JustValidate(document.querySelector("#predictions"));

  validator
    .addField(document.querySelector("#p1"), [
        {
            rule: 'required',
        },
        {
            validator: (value) => {
                if (value === document.querySelector("#p2").value ||
                    value === document.querySelector("#p3").value ||
                    value === document.querySelector("#p4").value ||
                    value === document.querySelector("#p5").value ||
                    value === document.querySelector("#p6").value ||
                    value === document.querySelector("#p7").value ||
                    value === document.querySelector("#p8").value ||
                    value === document.querySelector("#p9").value ||
                    value === document.querySelector("#p10").value
                ) {
                    return false;
                } else {
                    return true;
                }
            },
            errorMessage: "You cannot select the same driver twice."
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