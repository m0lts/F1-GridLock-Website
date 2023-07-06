const validator = new JustValidate(document.querySelector("#predictions"));

  validator
    .addField(document.querySelector("#p1"), [
        {
            rule: 'required',
        },
        {
            rule: 'compare',
            comparison: function () {
              const p1Value = document.querySelector("#p1").value;
              const p2Value = document.querySelector("#p2").value;
              return p1Value !== p2Value;
            },
            message: "You cannot select the same driver twice"
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