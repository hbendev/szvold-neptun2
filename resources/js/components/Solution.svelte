<script>
  import { onMount } from "svelte";
  export let taskid;
  let text;
  let err = null;

  async function handlePost(e) {
    e.preventDefault();
    if (!text) {
      err = "Kötelező megadni";
      return;
    }
    err = null;
    console.log(taskid);
    console.log(text);
    let token = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
    try {
      await fetch(`/api/tasks/${taskid}/solution`, {
        method: "POST", // todo: web routes don't support delete method...
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
        },
        credentials: "same-origin",
        body: JSON.stringify({ solution: text })
      });
      //   window.location.replace("/home"); // todo: redirect feladat részletei oldalra ( ugyan ez? )
    } catch (err) {
      console.error(err);
    }
  }
</script>

<style>
  @import "/css/app.css";
</style>

<form class="w-full max-w-lg mx-auto" on:submit={handlePost}>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label
        required
        class="block uppercase tracking-wide text-gray-700 text-xs font-bold
        mb-2"
        for="credit">
        Megoldás
      </label>
      <textarea
        autocomplete="description"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border
        border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 min-h-32"
        id="description"
        name="description"
        placeholder="Kezdjen el gépelni..."
        bind:value={text} />
      {#if err}
        <p role="alert" class="text-red-500 text-xs italic">{err}</p>
      {/if}

    </div>
  </div>
  <button
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded
    focus:outline-none focus:shadow-outline mt-8"
    type="submit">
    Feladat beadása
  </button>
</form>
