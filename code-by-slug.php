  <?php
/********************************************************* display this code just on pages that have these specific Slug ****************************************/

      $currentSlug = $_SERVER['REQUEST_URI'];
      if (strpos($currentSlug, '/Promotion/') !== false || strpos($currentSlug, '/Clothes/') !== false || strpos($currentSlug, '/Electronics/') !== false):?>
          <div style="display:flex;justify-content: center;" class="col-lg-5">
              <div class="promotion">
                  <div class="promotion-text">
                      <span class="crossed-out">$150</span>
                      <p class="current-price">$120*</p>
                  </div>
                  <img class="price-tag" src="./price-tag.svg" alt="price tag promotion" />
              </div>
          </div>
  <?php endif;?>
