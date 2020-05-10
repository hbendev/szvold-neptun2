<script>
  import { onMount } from "svelte";
  export let userid;
  export let usertype;
  export let subjectid;

  let subject;

  async function handleDelete() {
    let token = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
    try {
      await fetch(`/api/subjects/${subjectid}/delete`, {
        method: "POST", // todo: web routes don't support delete method...
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
        },
        credentials: "same-origin"
      });
      window.location.replace("/home"); // todo: redirect doesn't work backend side
    } catch (err) {
      console.error(err);
    }
  }

  onMount(() => {
    setTimeout(async () => {
      subject = await fetch(`/api/subjects/${subjectid}`).then(data =>
        data.json()
      );
    }, 0);
  });
</script>

<style>
  @import "/css/app.css";
</style>

{#if usertype === 'teacher'}
  <div class="flex justify-between container mx-auto">
    <a href={`/subjects/${subjectid}/edit`}>
      <button
        class="font-bold py-2 px-4 rounded text-lg bg-blue-400 hover:bg-blue-600
        text-white ">
        Szerkesztés
      </button>
    </a>
    <button
      on:click={handleDelete}
      class="font-bold py-2 px-4 rounded text-lg bg-red-400 hover:bg-red-600
      text-white ">
      Törlés
    </button>

  </div>
  <subject-info {userid} {subject} />
{:else}
  <subject-info {userid} {subject} />
{/if}
