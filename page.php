<ion-split-pane content-id="main">
  <!--  the side menu  -->
  <ion-menu content-id="main">
    <ion-content class="ion-content">
      <ion-list id="document-list">
        <ion-list-header class="ion-text-capitalize">${this.title.replace(/-|_/g, ' ')}</ion-list-header>
        <ion-note>Document</ion-note>
        <ion-item button lines="none" onclick="home()">
        <ion-icon slot="start" ios="home-outline" md="home-sharp"></ion-icon>
          <ion-label class="ion-text-capitalize">home</ion-label>
        </ion-item>
        ${ this.menus.map(menu => `
        <ion-item button lines="none" onclick="scrollToView('${menu.href}')">
          <ion-icon slot="start"></ion-icon>
          <ion-label class="ion-text-capitalize ${menu.level}">${menu.title}</ion-label>
        </ion-item>
        `).join('') }
      </ion-list>
    </ion-content>
  </ion-menu>
  <ion-content id="main" class="ion-content">
    <ion-header>
      <ion-toolbar>
        <ion-icon class="ion-padding" slot="start" name="menu" id="menu_btn"></ion-icon>
        <ion-title></ion-title>
      </ion-toolbar>
    </ion-header>
    ${ this.renderIf(this.hasData, `
    <div>Has Data</div>  
    `) }
    ${ this.renderIf(!this.hasData, `
    <div>No Data</div>  
    `) }
  </ion-content>
</ion-split-pane>