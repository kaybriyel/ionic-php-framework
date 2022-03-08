<?php
require_once('assets/php_js/page.js.php');
require_once('assets/php_js/home.js.php');

function menus()
{
  return ['page-1', 'page-2', 'page-3'];
}
?>


<script type="text/javascript">
  const nav = document.querySelector('ion-nav')

  customElements.define(
    'nav-home',
    NavHome
  )

  customElements.define(
    'nav-page',
    NavPage
  )

  function debug() {
    console.log(...arguments)
    return ''
  }

  function scrollToView(id) {
    document.querySelector(id)?.scrollIntoView({
      behavior: 'smooth'
    })
  }

  function goto(title) {
    history.replaceState('', '', `/${title}`)
    nav.push('nav-page', {
      title
    })
    document.querySelector('nav-home')?.remove()
  }

  function home() {
    history.replaceState('', '', '/')
    nav.push('nav-home')
    document.querySelector('nav-page')?.remove()
  }

  async function presentLoading({
    spinner,
    duration,
    message,
    translucent,
    cssClass,
    backdropDismiss
  } = {}) {
    window.loading?.dismiss()

    loading = document.createElement('ion-loading')

    loading.spinner = spinner || 'bubbles' //"bubbles" ｜ "circles" ｜ "circular" ｜ "crescent" ｜ "dots" ｜ "lines" ｜ "lines-sharp" ｜ "lines-sharp-small" ｜ "lines-small" ｜ null ｜ undefined
    loading.duration = duration || 15000
    loading.message = message || 'Loading...'
    loading.translucent = translucent || true
    loading.cssClass = cssClass || 'custom-class custom-loading'
    loading.backdropDismiss = backdropDismiss || true

    document.body.appendChild(loading)
    await loading.present()

    const {
      role,
      data
    } = await loading.onDidDismiss()
  }

  function dismissLoading() {
    return window.loading?.dismiss()
  }
</script>

<script role="onload">
  onload = () => {
    const path = location.pathname.replace('/', '')
    if (path && path !== 'home')
      goto(path)
  }
</script>