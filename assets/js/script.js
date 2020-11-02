const corsAnywherePrefix = 'https://cors-anywhere.herokuapp.com/';
const searchUrlPrefix = 'https://store.playstation.com/chihiro-api/bucket-search/RU/ru/999/';

const input = document.getElementById('input');
const itemName = document.getElementById('item-name');

async function request(url) {
    const response = await fetch(url);
    if (response.ok) {
        return await response.json();
    } else {
        return false;
    }
}

function formEntities(results) {
    results.forEach(result => {
        if (result['top_category'] !== 'promotional_material') {
            const item = {};

            if (result['top_category'] === 'downloadable_game') {
                item.imageUrl =
                    `https://store.playstation.com/store/api/chihiro/00_09_000/titlecontainer/RU/ru/999/${
                        result['id'].split('-')[1]
                    }/image?w=236&h=236`;

            } else {
                request(result['url'])
                    .then(data => {
                        if (data !== false) {
                            item.imageUrl = data['images'][0]['url'];
                        }
                    });
            }

            item.id = result['id'];
            item.name = result['name'];
            item.displayDefaultPrice = result['default_sku']['display_price'];

            if (result['skus'][0]['rewards'].length > 0) {
                item.displayDiscountPrice = result['skus'][0]['rewards'][0]['display_price'];
                item.discountPercent = result['skus'][0]['rewards'][0]['discount'];
            }

            item.platforms = result['playable_platform'];
            item.releaseDate = result['release_date'];

            console.log(item);
        }
    });
}

function search(name) {
    request(corsAnywherePrefix + searchUrlPrefix + encodeURI(name))
        .then(data => {
            if (data !== false) {
                formEntities(data['categories']['games']['links']);
            }
        });

    return false;
}

