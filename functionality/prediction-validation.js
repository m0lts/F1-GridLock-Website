const validator = new JustValidate("#predictions");

  validator
    .addField("p1", [
        {
            rule: 'required',
        },
        {
            validator: (value) => {
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