<ons-template id="dashboard.html">
    <ons-page>
      <ons-toolbar id="reload">
        <div class="center">HOME</div>
      </ons-toolbar>
      <div class="content" id="content">
        <h2 class="title--home">Recently Update..</h2>
        <div class="row">
          <div class="col s12">
            <ul class="tabs-recently background--mind__ice" id="recently">
              
            </ul>
          </div>
        </div>
        <h2 class="title--home">Category..</h2>  
        <div class="row" >
          <div class="col s12"   >
            <ul class="tabs-category background--mind__ice" id="category" >
            </ul>
          </div>
        </div>
        <div class="row" id="category-click" style="display:none;">
          <div class="col s12 m7">
            <ul class="tabs-category" id="cat-click">
              <li class="tab-category ">
                <ons-card></ons-card>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </ons-page>
  </ons-template>