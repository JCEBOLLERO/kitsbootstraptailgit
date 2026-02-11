export default function clientSelector({ clientes } ) {
        return {
            clientCode: '',
            clientName: '',
            search: '',
            clients: clientes,
            filteredClients: clientes,

            init() {
                this.filteredClients = this.clients;
                // console.log(this.clients)
            },

            filterClients() {
                const s = this.search.toLowerCase();
                this.filteredClients = this.clients.filter(c =>
                    c.id.toString().toLowerCase().includes(s) ||
                    c.nombre.toLowerCase().includes(s)
                );
            },

            selectClient(c) {
                this.clientCode = c.id;
                this.clientName = c.nombre;
            },

            findClientByCode() {
                // alert(this.clientCode);
                const c = this.clients.find(x => x.id == this.clientCode);
                this.clientName = c ? c.nombre : '';
                // alert(this.clientName)
            }
        }
    }