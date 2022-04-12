<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-uppercase">
            Nome
          </th>
          <th class="text-center text-uppercase">
            Autor
          </th>
          <th class="text-center text-uppercase">
            Categoria
          </th>
          <th class="text-center text-uppercase">
            Código
          </th>
          <th class="text-center text-uppercase">
            Tipo
          </th>
          <th class="text-center text-uppercase">
            Tamanho
          </th>
          <th class="text-center text-uppercase">
            Data 
          </th>
          <th class="text-center text-uppercase">
            Açoes 
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in livros"
          :key="item.id"
        >
          <td>{{ item.nome }}</td>
          <td class="text-center">
            {{ item.autor }}
          </td>
          <td class="text-center">
            {{ item.categoria }}
          </td>
          <td class="text-center">
            {{ item.codigo }}
          </td>
          <td class="text-center">
            {{ item.tipo }}
          </td>
          <td class="text-center">
            {{ item.tamanho }}
          </td>
          <td class="text-center">
            {{ item.updated_at }}
          </td>
          <td class="text-center">
          </td>
        </tr>
      </tbody>
        <div class="text-center">
    <v-pagination
      v-model="page"
      :length="pageCount"
      @input="onPageChange"
      circle
    ></v-pagination>
  </div>
    </template>
  </v-simple-table>
  
</template>

<script>
export default {
  props: {
      livros: {
          type: Object,
          default: () => ({}),
      },
      paginacao: {
          type: Object,
          default: () => ({ "current_page": 1, "from": 1, "last_page": 1, "per_page": 15}),
      },

  },
  methods: {
      onPageChange() {
          console.log('page '+ this.page) 
      },
  },

  data() {
      return {
        page: this.paginacao.current_page,
        pageCount: this.paginacao.last_page,
      };
  },
}
</script>
