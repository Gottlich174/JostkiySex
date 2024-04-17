const ratingItemsList = document.querySelectorAll('.rating_item');
const ratingItemsArray = Array.prototype.slice.call(ratingItemsList);

ratingItemsArray.forEach(item =>
    item.addEventListener('click', () => {
            item.parentNode.dataset.totalValue = item.dataset.itemValue;
        }
    )
);

document.getElementById('sendbtn').addEventListener('click',function (){

    let username = String(document.getElementById('username').value);
    let review_text = String(document.getElementById('review_text').value);
    let hardware_id = String(document.getElementById('hardware_id').dataset.id);
    let rating = String(document.getElementById('rating').dataset.totalValue);

    $.ajax({
        url: 'http://localhost:63342/NMSTU/createreview.php',
        type: 'POST',
        dataType: 'json',
        data: {
            hardware_id: hardware_id,
            review_text: review_text,
            username: username,
            rate: rating,
        },
        success: function (data) {
        }
    })

    })



