<script>
  class NavHome extends HTMLElement {
    connectedCallback() {
      presentLoading()
      this.innerHTML = `<?php require_once('home.php') ?>`
      this.querySelector('#menu_btn').onclick = () => this.querySelector('ion-menu').toggle()
      this.querySelector('ion-split-pane').addEventListener('ionSplitPaneVisible', ({
        detail: {
          visible
        }
      }) => {
        if (visible) this.querySelector('#menu_btn').setAttribute('hidden', true)
        else this.querySelector('#menu_btn').removeAttribute('hidden')
      })
      dismissLoading()
    }
  }
</script>