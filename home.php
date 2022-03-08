<ion-split-pane content-id="main">
  <!--  the side menu  -->
  <ion-menu content-id="main">
    <ion-content class="ion-content">
      <ion-list id="document-list">
        <ion-list-header>Document</ion-list-header>
        <ion-note></ion-note>

        <?php foreach (menus() as $value) { ?>
          <ion-item button lines="none" onclick="goto('<?php echo $value ?>')">
            <ion-icon slot="start"></ion-icon>
            <ion-label class="ion-text-capitalize">${'<?php echo $value ?>'.replace(/-|_/g, ' ')}</ion-label>
          </ion-item>
        <?php } ?>

      </ion-list>
    </ion-content>
  </ion-menu>
  <ion-content id="main" class="ion-content">
    <ion-header>
      <ion-toolbar>
      <ion-icon class="ion-padding" slot="start" name="menu" id="menu_btn"></ion-icon>
      </ion-toolbar>
    </ion-header>
  </ion-content>
</ion-split-pane>