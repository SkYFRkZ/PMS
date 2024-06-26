<style>
    .rating {
        direction: rtl;
        unicode-bidi: bidi-override;
        color: #ddd;
        /* Personal choice */
        font-size: 8px;
        margin-left: -15px;
    }

    .rating input {
        display: none;
    }

    .rating label:hover,
    .rating label:hover~label,
    .rating input:checked+label,
    .rating input:checked+label~label {
        color: #ffc107;
        /* Personal color choice. Lifted from Bootstrap 4 */
        font-size: 8px;
    }

    .front-stars,
    .back-stars,
    .star-rating {
        display: flex;
    }

    .star-rating {
        align-items: left;
        font-size: 1.5em;
        justify-content: left;
        margin-left: -5px;
    }

    .back-stars {
        color: #ccc;
        position: relative;
    }

    .front-stars {
        color: #ffbc0b;
        overflow: hidden;
        position: absolute;
        top: 0;
        transition: all 0.5s;
    }

    .percent {
        color: #bb5252;
        font-size: 1.5em;
    }
</style>


<div class="container">
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="col-md-8">
            <div class="row">
                <h3 class="h4 pb-3">Write a Review</h3>
                <div class="form-group col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group mb-3">
                    <label for="rating">Rating</label>
                    <br>
                    <div class="rating" style="width: 10rem">
                        <input id="rating-5" type="radio" name="rating" value="5" /><label for="rating-5"><i
                                class="fas fa-3x fa-star"></i></label>
                        <input id="rating-4" type="radio" name="rating" value="4" /><label for="rating-4"><i
                                class="fas fa-3x fa-star"></i></label>
                        <input id="rating-3" type="radio" name="rating" value="3" /><label for="rating-3"><i
                                class="fas fa-3x fa-star"></i></label>
                        <input id="rating-2" type="radio" name="rating" value="2" /><label for="rating-2"><i
                                class="fas fa-3x fa-star"></i></label>
                        <input id="rating-1" type="radio" name="rating" value="1" /><label for="rating-1"><i
                                class="fas fa-3x fa-star"></i></label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">How was your overall experience?</label>
                    <textarea name="review" id="review" class="form-control" cols="30" rows="10"
                        placeholder="How was your overall experience?"></textarea>
                </div>
                <div>
                    <button class="btn btn-dark">Submit</button>
                </div>

            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="overall-rating mb-3">
                <div class="d-flex">
                    <h1 class="h3 pe-3">4.0</h1>
                    <div class="star-rating mt-2" title="70%">
                        <div class="back-stars">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>

                            <div class="front-stars" style="width: 70%">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 ps-2">(03 Reviews)</div>
                </div>

            </div>
            <div class="rating-group mb-4">
                <span> <strong>Mohit Singh </strong></span>
                <div class="star-rating mt-2" title="70%">
                    <div class="back-stars">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>

                        <div class="front-stars" style="width: 70%">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <p>I went with the blue model for my new apartment and an very pleased with the purchase. I'm
                        definitely someone not used to paying this much for furniture, and I am also anxious about
                        buying online, but I am very happy with the quality of this couch. For me, it is the perfect mix
                        of cushy firmness, and it arrived defect free. It really is well made and hopefully will be my
                        main couch for a long time. I paid for the extra delivery & box removal, and had an excellent
                        experience as well. I do tend move my own furniture, but with an online purchase this expensive,
                        that helped relieved my anxiety about having a item this big open up in my space without issues.
                        If you need a functional sectional couch and like the feel of leather, this really is a great
                        choice.

                    </p>
                </div>
            </div>

            <div class="rating-group mb-4">
                <span class="author"><strong>Mohit Singh </strong></span>
                <div class="star-rating mt-2">
                    <div class="back-stars">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>

                        <div class="front-stars" style="width: 100%">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <p>I went with the blue model for my new apartment and an very pleased with the purchase. I'm
                        definitely someone not used to paying this much for furniture, and I am also anxious about
                        buying online, but I am very happy with the quality of this couch. For me, it is the perfect mix
                        of cushy firmness, and it arrived defect free. It really is well made and hopefully will be my
                        main couch for a long time. I paid for the extra delivery & box removal, and had an excellent
                        experience as well. I do tend move my own furniture, but with an online purchase this expensive,
                        that helped relieved my anxiety about having a item this big open up in my space without issues.
                        If you need a functional sectional couch and like the feel of leather, this really is a great
                        choice.

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
