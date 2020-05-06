<script>
  import { onMount } from "svelte";
  export let testdata;
  export let user; // json, but empty if logged in
  onMount(() => {
    setTimeout(() => {
      debugger;
      console.log({ testdata }, { user }); // work
    }, 0);
  });
</script>

<style>
  @import "css/app.css";
</style>

<nav class="w-5/6 mx-auto">
  <ul class="h-16 flex justify-between items-center">
    <li>
      <a href="/">Neptun 2</a>
    </li>
    {#if !user}
      <li>
        <a href="/login">Login</a>
      </li>
      <li>
        <a href="/register">Register</a>
      </li>
    {/if}
    {#if user}
      <li>
        <form action="/logout" method="POST">
          <button>Kilépés</button>
        </form>
      </li>
    {/if}

  </ul>
</nav>
