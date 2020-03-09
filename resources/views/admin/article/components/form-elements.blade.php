<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.article.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('author'), 'has-success': fields.author_id && fields.author_id.valid }">
    <label for="author_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.author_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        {{-- <option v-for="item in items"
                value="@{{item.list}}"
                :selected="item.list=={{json_encode($ads->city)}}?true : false">
            @{{item.list}}
        </option> --}}

        {{-- @{{ selected }} --}}

        <multiselect
                     v-model="form.author"
                     :options="authors"
                     {{-- :options="{{ $authors->map(function($author) { return ['id' => $author->id, 'value' =>  $author->name]; }) }}" --}}

                     {{-- :selected="author_id == form.author.id" --}}
                     label="name"
                     track-by="id"
                     tag-placeholder="{{ __('Select Author') }}"
                     placeholder="{{ __('Author') }}"
                     :multiple="false" >
        </multiselect>
        <div v-if="errors.has('author')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('author') }} </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="published_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.published_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.published_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('published_at'), 'form-control-success': fields.published_at && fields.published_at.valid}" id="published_at" name="published_at" placeholder="Select date and time"></datetime>
        </div>
        <div v-if="errors.has('published_at')" class="form-control-feedback form-text" v-cloak>@{{errors.first('published_at') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('author_id'), 'has-success': fields.author_id && fields.author_id.valid }">
    <label for="author_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.author_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.author_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('author_id'), 'form-control-success': fields.author_id && fields.author_id.valid}" id="author_id" name="author_id" placeholder="{{ trans('admin.article.columns.author_id') }}">
        <div v-if="errors.has('author_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('author_id') }}</div>
    </div>
</div>
 --}}
