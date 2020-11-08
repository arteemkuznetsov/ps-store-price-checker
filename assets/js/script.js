const input = document.getElementById('input');
const resultsContainer = document.getElementById('results-container');
const itemName = document.getElementById('item-name');

async function ajaxSearch(name) {
    const response = await fetch(`application/ajax/ajax_search.php?name=${name}`);
    if (response.ok) {
        return await response.json();
    } else {
        return false;
    }
}

async function ajaxRender(list) {
    let formData = new FormData();
    formData.append("items", JSON.stringify(list));
    const response = await fetch('application/ajax/ajax_render.php',
        {
            method: "POST",
            body: formData
        }
    );
    if (response.ok) {
        return await response.text();
    } else {
        return false;
    }
}

function formEntities(results) {
    let itemCollection = [];

    results.forEach(result => {
        if (result['top_category'] !== 'promotional_material') {
            const item = {};

            if (result['top_category'] === 'downloadable_game') {
                item.id = result['id'];
                item.name = result['name'];
                item.displayDefaultPrice = result['default_sku']['display_price'];
                item.imageUrl =
                    `https://store.playstation.com/store/api/chihiro/00_09_000/titlecontainer/RU/ru/999/${
                        result['id'].split('-')[1]
                    }/image?w=236&h=236`;

                if (result['skus'][0]['rewards'] !== undefined && result['skus'][0]['rewards'].length > 0) {
                    item.displayDiscountPrice = result['skus'][0]['rewards'][0]['display_price'];
                    item.discountPercent = result['skus'][0]['rewards'][0]['discount'];
                }

                item.platforms = result['playable_platform'];
                item.releaseDate = result['release_date'];

                itemCollection.push(item);

            } else {
                console.log('dlc:');
                console.log(result);
                /*ajaxSearch(result['url'])
                    .then(data => {
                        if (data !== false) {
                            item.imageUrl = data['images'][0]['url'];
                        }
                    });*/
            }
        }
    });

    return itemCollection;
}

function search(name) {
    ajaxSearch(encodeURI(name))
        .then(data => {
                if (data['total_results'] > 0) {
                    let itemCollection = formEntities(data['categories']['games']['links']);
                    console.log(itemCollection);
                    ajaxRender(itemCollection)
                        .then(html => {
                            resultsContainer.innerHTML = html;
                            itemName.innerText = input.value;
                        });
                }
            }
        )
        .catch(error => {
            console.log(error);
        });

    return false;
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
