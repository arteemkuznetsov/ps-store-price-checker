document.cookie += ';SameSite=None;SameSite=Secure';

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

let itemImages = document.getElementsByClassName('results-item-img-container__img');
if (itemImages.length > 0) {
    for (let i = 0; i < itemImages.length; i++) {
        ajaxGet(itemImages[i].dataset.url)
            .then(data => {
                itemImages[i].src = data['images'][0]['url'];
                itemImages[i].onerror = () => {
                    itemImages[i].error = null;
                    itemImages[i].src = './assets/img/not-found.png';
                }
                itemImages[i].onload = () => {
                    itemImages[i].parentNode.querySelector('.layer-loading').style.display = 'none';
                };
            })
            .catch(ignored => {
            });
    }
}

function addToWishlist(button) {
    // отсылаем JSON с id игры на сервер. если сервер вставил игру в БД и ответил "ок, такой игры не было" - закрашиваем сердечко
    let img = button.querySelector('img');

    if (img.src.endsWith('assets/img/heart.png')) {
        // собственно тут в скобках и будет проверка НЕ ПО КАРТИНКЕ, а по ответу сервера
        img.src = './assets/img/heart_filled.png';
    } else {
        img.src = './assets/img/heart.png';
    }
}

function registerNewUser(form) {
    ajaxPost('../application/ajax/registration.php', new FormData(form))
        .then(data => {
            console.log(data);
            return false;
        })
        .catch(ignored => {
            console.log(ignored)
        });
    return false;
}
