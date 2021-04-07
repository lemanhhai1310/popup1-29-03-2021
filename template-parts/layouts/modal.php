<!-- This is the modal with the outside close button -->
<div id="modal-close-outside-popup1" class="modal uk-flex-top" uk-modal>
    <div class="modal__dialog uk-modal-dialog uk-margin-auto-vertical uk-modal-body uk-background-norepeat uk-background-cover uk-background-center-center" data-src="images/bg.png" uk-img>
        <button class="uk-modal-close-outside modal__close uk-icon uk-close" type="button">
            <img src="images/popup-off.png" alt="">
        </button>
        <div class="uk-flex-top" uk-grid>
            <div class="uk-width-expand">
                <div class="mb-25 mb-48-m"><a href=""><img src="images/logo1.png" alt=""></a></div>
                <div class="mb-25 mb-44-m uk-text-center">
                    <img src="images/ig1.png" alt="">
                    <div class="modal__title3 uk-hidden">
                        <div>VÒNG QUAY</div>
                        <div>MAY MẮN</div>
                    </div>
                    <div class="uk-child-width-auto uk-flex-center uk-text-center uk-hidden" uk-grid>
                        <div>
                            <div class="modal__title2">Quay liền tay <br>
                                nhận quà ngay</div>
                        </div>
                    </div>
                </div>
                <div class="modal__title1">Thể lệ</div>
                <ul class="uk-list modal__list uk-margin-remove">
                    <li>Mỗi người chơi sẽ có 1 lượt quay</li>
                    <li>Người chơi điền đẩy đủ thông tin bao gồm Họ tên, sđt, email để bắt đầu</li>
                    <li>Cứ quay là sẽ có quà</li>
                    <li>Thời gian tham gia từ 15/3 – 30/4/2021</li>
                </ul>
                <button type="button" class="modal__btnStart uk-border-rounded uk-button uk-button-secondary">bắt đầu chơi</button>
            </div>
            <div class="uk-width-auto@m">
                <div class="uk-text-center">
                    <img class="modal__img1 uk-width-3-5" src="images/quaylatrung.png" alt="">
                </div>
                <div class="uk-text-center modal__box1 uk-position-relative uk-position-z-index uk-flex uk-flex-middle uk-flex-center uk-background-contain" data-src="images/bg2.png" uk-img>
                    <section id="luckywheel" class="hc-luckywheel uk-display-inline-block uk-position-relative">
                        <?php $v1 = '500'; ?>
                        <div class="hc-luckywheel-container">
                            <canvas class="hc-luckywheel-canvas" width="<?= $v1 ?>" height="<?= $v1 ?>">Vòng Xoay May Mắn</canvas>
                        </div>
                        <a class="hc-luckywheel-btn uk-position-center" style="left: 50%;top: 50%" href="javascript:;">
                            <img class="uk-position-bottom-center" src="images/kim.png" alt="">
                        </a>
                    </section>
                </div>
                <div class="uk-text-center">
                    <img class="modal__img2 uk-width-1-3" src="images/chanmanhinh.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    UIkit.modal('#modal-close-outside-popup1').show();
</script>

<script>
    var isPercentage = true;
    var prizes = [
        {
            text: "Đèn Led USB",
            img: "images/Qua/den-led.png",
            number: 1, // 1%,
            percentpage: 0.05 // 5%
        },
        {
            text: "Sạc dự phòng",
            img: "images/Qua/Sạc-dự-phòng.png",
            percentpage: 0 // 0%
        },
        {
            text: "Lót chuột",
            img: "images/Qua/Lót-chuột.png",
            number: 1,
            percentpage: 0.05 // 5%
        },
        {
            text: "Voucher khoá học",
            img: "images/Qua/Vocuher-khóa-học.png",
            percentpage: 0.9 // 90%
        },
        {
            text: "Thẻ Game Garena 100k",
            img: "images/Qua/Thẻ-Game.png",
            percentpage: 0 // 0%
        },
        {
            text: "Loa Bluetooth",
            img: "images/Qua/Loa-JBL.png",
            percentpage: 0 // 0%
        },
    ];
    document.addEventListener(
        "DOMContentLoaded",
        function() {
            hcLuckywheel.init({
                id: "luckywheel",
                config: function(callback) {
                    callback &&
                    callback(prizes);
                },
                mode : "both",
                getPrize: function(callback) {
                    var rand = randomIndex(prizes);
                    var chances = rand;
                    callback && callback([rand, chances]);
                },
                gotBack: function(data) {
                    if(data == null){
                        Swal.fire(
                            'Chương trình kết thúc',
                            'Đã hết phần thưởng',
                            'error',
                        )
                    } else if (data == 'Chúc bạn may mắn lần sau'){
                        Swal.fire(
                            'Bạn không trúng thưởng',
                            data,
                            'error',
                        )
                    } else{
                        // Swal.fire(
                        //     'Đã trúng giải',
                        //     data,
                        //     'success',
                        // )
                        console.log(data);
                        Swal.fire({
                            title: 'Đã trúng giải',
                            text: data,
                            // imageUrl: data,
                            icon: 'success',
                        })
                    }
                }
            });
        },
        false
    );
    function randomIndex(prizes){
        if(isPercentage){
            var counter = 1;
            for (let i = 0; i < prizes.length; i++) {
                if(prizes[i].number == 0){
                    counter++
                }
            }
            if(counter == prizes.length){
                return null
            }
            let rand = Math.random();
            let prizeIndex = null;
            console.log(rand);
            switch (true) {
                case rand < prizes[5].percentpage:
                    prizeIndex = 5 ;
                    break;
                case rand < prizes[5].percentpage + prizes[4].percentpage:
                    prizeIndex = 4;
                    break;
                case rand < prizes[5].percentpage + prizes[4].percentpage + prizes[3].percentpage:
                    prizeIndex = 3;
                    break;
                case rand < prizes[5].percentpage + prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage:
                    prizeIndex = 2;
                    break;
                case rand < prizes[5].percentpage + prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage  + prizes[1].percentpage:
                    prizeIndex = 1;
                    break;
                case rand < prizes[5].percentpage + prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage  + prizes[1].percentpage  + prizes[0].percentpage:
                    prizeIndex = 0;
                    break;
            }
            if(prizes[prizeIndex].number != 0){
                prizes[prizeIndex].number = prizes[prizeIndex].number - 1
                return prizeIndex
            }else{
                return randomIndex(prizes)
            }
        }else{
            var counter = 0;
            for (let i = 0; i < prizes.length; i++) {
                if(prizes[i].number == 0){
                    counter++
                }
            }
            if(counter == prizes.length){
                return null
            }
            var rand = (Math.random() * (prizes.length)) >>> 0;
            if(prizes[rand].number != 0){
                prizes[rand].number = prizes[rand].number - 1
                return rand
            }else{
                return randomIndex(prizes)
            }
        }
    }
</script>