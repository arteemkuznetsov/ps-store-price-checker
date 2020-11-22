//document.cookie += ';SameSite=None;SameSite=Secure';
const ROOT = '/ps-store-parser';

async function ajaxGet(url) {
    const response = await fetch(url);
    if (response.ok) {
        return await response.json();
    } else {
        return false;
    }
}

async function ajaxPost(url, data) {
    const response = await fetch(url, {
        method: 'POST',
        body: data
    });
    if (response.ok) {
        return await response.json();
    } else {
        return false;
    }
}

function addOrDeleteItem(button) {
    // отсылаем JSON с id игры на сервер. если сервер вставил игру в БД и ответил "ок, такой игры не было" - закрашиваем сердечко
    let img = button.querySelector('img');
    let titleId = button.dataset.id;

    let formData = new FormData();
    formData.append("title_id", titleId);

    ajaxPost(`${ROOT}/application/ajax/ajax_add-delete-wishlist.php`, formData)
        .then(data => {
            if (parseInt(data["status"]) === 1) {
                img.src = `${ROOT}/assets/img/heart_filled.png`;
            }
            else if (parseInt(data["status"]) === 2) {
                img.src = `${ROOT}/assets/img/heart.png`;
            }
        })
        .catch(ignored => {
        })
}

function loginUser(form) {
    ajaxPost(`${ROOT}/application/ajax/ajax_auth.php`, new FormData(form))
        .then(data => {
            if (parseInt(data['status']) === 0) {
                alert('Ошибка входа.');
            } else if (parseInt(data['status']) === 1) {
                alert('Аутентификация выполнена успешно.');
            }
            return false;
        })
        .catch(ignored => {
        })
    return false;
}

function registerNewUser(form) {
    ajaxPost(`${ROOT}/application/ajax/ajax_registration.php`, new FormData(form))
        .then(data => {
            if (parseInt(data['status']) === 0) {
                document.getElementById('error_block').style.display = 'flex';
                document.getElementById('error_text').innerHTML = '';
                data['errors'].forEach(error => {
                    document.getElementById('error_text').innerHTML += error['message'] + '<br>';
                });
            } else if (parseInt(data['status']) === 1) {
                /* return true и написать <form action="/registered.php">, где будет написано "Активируйте учетную запись" */
                alert('Подтвердите активацию аккаунта, перейдя по ссылке, которая была отправлена на адрес вашей электронной почту.')
            }
            return false;
        })
        .catch(ignored => {
        });
    return false;
}
