function fillSelectDestiny() {
    let destiny = document.getElementById('destiny').children;

    Array.from(destiny).forEach(element => {
        element.disabled = false;
    });

    document.getElementById('msg_error').style.display = 'none';
    document.getElementById('comparative').style.display = 'none';
    checkDestiny(destiny);
}

function checkDestiny(destiny) {
    let origin = document.getElementById('origin').value;

    Array.from(destiny).forEach(element => {
        if (element.value === origin) {
            element.disabled = true;
        }
    });

}

function releaseSelect(id) {
    let select = document.getElementById(id);
    select.disabled = false;
}

function calculate() {
    let origin = document.getElementById('origin').value;
    let destiny = document.getElementById('destiny').value;
    let time = document.getElementById('time').value;
    let plan = document.getElementById('plan').value;

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let url = "/calculate";

    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            origin: origin,
            destiny: destiny,
            time: time,
            plan: plan
        })
    })
        .then((response) => response.json())
        .then(result => {
            if (result.error) {
                document.getElementById('msg_error').style.display = '';
                document.getElementById('msg_error').innerHTML = result.error;
            } else {
                let withPlan = result.msg.withPlan_price;
                let withoutPlan = result.msg.withoutPlan_price;
                document.getElementById('comparative').style.display = '';
                document.getElementById('withPlan').innerHTML = withPlan.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
                document.getElementById('withoutPlan').innerHTML = withoutPlan.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' })
            }
            document.getElementById('origin').value = "";
            document.getElementById('destiny').value = "";
            document.getElementById('time').value = "";
            document.getElementById('plan').value = "";

            document.getElementById('time').disabled = true;
            document.getElementById('plan').disabled = true;
        })
        .catch(function (error) {
            console.log(error);
        });
}
