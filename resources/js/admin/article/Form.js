import AppForm from '../app-components/Form/AppForm';

Vue.component('article-form', {
    mixins: [AppForm],
    props: ['authors'],
    data: function() {
        return {
            form: {
                title:  '' ,
                description:  '' ,
                published_at:  '' ,
                // author_id:  '' ,
                author: '',

            }
        }
    }

});