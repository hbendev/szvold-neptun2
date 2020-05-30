<script>
  export let subject = {};
  export let teacher = false;

  function transformDate(str) {
    return new Date(str).toLocaleString();
  }

  const currentTime = new Date();

  function isTrue(bool) {
    return bool === "true";
  }
</script>

<style>
  @import "/css/app.css";
</style>

<section>
  <h1 class="text-center text-blue-500 font-bold text-4xl">
    {subject.name} - {subject.identifier}
  </h1>
  <div class="flex flex-col justify-center items-center space-y-4 mt-6">
    <p>Leírás: {subject.description}</p>
    <p>Kreditérték: {subject.credit}</p>
    <p>
      Létrehozás dátuma: {new Date(subject.created_at).toLocaleDateString('hu')}
    </p>
    <p>
      Utoljára módosítva: {new Date(subject.updated_at).toLocaleDateString('hu')}
    </p>
    <p>Hallgatók száma: {subject.students && subject.students.length}</p>
    <p>
      Tanár: {subject.creator && subject.creator.lastName} {subject.creator && subject.creator.firstName},
      {subject.creator && subject.creator.email}
    </p>
  </div>
  <table class="text-left w-full border-collapse container mx-auto mt-8">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead>
      <tr>
        <th
          class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-600
          border-b border-gray-400">
          Név
        </th>
        <th
          class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-600
          border-b border-gray-400">
          Email
        </th>
      </tr>
    </thead>
    <tbody>
      {#each subject.students || [] as student}
        <tr class="hover:bg-gray-300">
          <td class="py-4 px-6 border-b border-gray-400">
            {student.lastName} {student.firstName}
          </td>
          <td class="py-4 px-6 border-b border-gray-400">{student.email}</td>
        </tr>
      {/each}
    </tbody>
  </table>
  {#if subject.tasks && subject.tasks.length}
    <table class="text-left w-full border-collapse container mx-auto mt-8">
      <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Név
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Pontszám
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Kezdés
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Határidő
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Akciók
          </th>
        </tr>
      </thead>
      <tbody>
        {#each (subject.tasks || [])
          .filter(task => {
            return isTrue(teacher) || (!isTrue(teacher) && (currentTime > new Date(task.from) && currentTime < new Date(task.to)));
          })
          .sort((a, b) => {
            return new Date(b.to) - new Date(a.to);
          }) as task}
          <!-- todo: switch params? -->
          <tr
            class="hover:bg-gray-300"
            class:bg-blue-300={currentTime > new Date(task.from) && currentTime < new Date(task.to)}
            class:bg-green-300={currentTime >= new Date(task.to) || task.solved}
            class:bg-red-300={currentTime <= new Date(task.from)}>
            <td class="py-4 px-6 border-b border-gray-400">{task.name}</td>
            <td class="py-4 px-6 border-b border-gray-400">{task.points}</td>
            <td class="py-4 px-6 border-b border-gray-400">
              {transformDate(task.from)}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {transformDate(task.to)}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              <a href={`/tasks/${task.id}`}>
                <button
                  class="text-gray-200 font-bold py-1 px-3 rounded text-xs
                  bg-blue-400 hover:bg-blue-600">
                  {isTrue(teacher) ? 'Részletek' : task.solved ? 'Újboli beadás' : 'Beadás'}
                </button>
              </a>
            </td>
          </tr>
        {/each}
      </tbody>
    </table>
  {/if}
</section>
