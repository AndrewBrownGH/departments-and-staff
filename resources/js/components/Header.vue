<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-container>
        <b-navbar-brand :href="site.href">{{ site.name }}</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <router-link v-for="link in links" :href="link.href" :to="link.href">{{ link.title }}</router-link>
          </b-navbar-nav>
        </b-collapse>
      </b-container>
    </b-navbar>
  </div>
</template>

<style>
  .navbar-nav a {
    color: #fff;
    margin-left: 20px;
  }
</style>

<script>
  export default {
    data() {
      return {
        site: {
          name: 'SetkaSite',
          href: '/',
        },
        links: [
          {
            title: 'Отделы',
            href: '/departments'
          },
          {
            title: 'Сотрудники',
            href: '/staff'
          }
        ]
      }
    }
  }
</script>