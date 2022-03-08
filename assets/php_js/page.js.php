<script>
  class NavPage extends HTMLElement {
    constructor() {
      super()
      this.menus = []
    }

    async connectedCallback() {
      presentLoading()
      await this.getData()
      this.render()
      dismissLoading()
    }

    render() {
      this.innerHTML = `<?php require_once('page.php') ?>`
      this.querySelector('#menu_btn').onclick = () => this.querySelector('ion-menu').toggle()
      this.querySelector('ion-split-pane').addEventListener('ionSplitPaneVisible', ({
        detail: {
          visible
        }
      }) => {
        if (visible) this.querySelector('#menu_btn').setAttribute('hidden', true)
        else this.querySelector('#menu_btn').removeAttribute('hidden')
      })
    }

    renderIf(con, template) {
      return con ? template : ''
    }

    getData() {}
  }
</script>