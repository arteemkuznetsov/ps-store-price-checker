let itemImages = document.getElementsByClassName('results-item-img-container__img');
if (itemImages.length > 0) {
    for (let i = 0; i < itemImages.length; i++) {
        ajaxGet(itemImages[i].dataset.url)
            .then(data => {
                itemImages[i].src = data['images'][0]['url'];
                itemImages[i].onerror = () => {
                    itemImages[i].error = null;
                    itemImages[i].src = `${ROOT}/assets/img/not-found.png`;
                }
                itemImages[i].onload = () => {
                    itemImages[i].parentNode.querySelector('.layer-loading').style.display = 'none';
                };
            })
            .catch(ignored => {
            });
    }
}