
<input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"name="image" type="file" id="file_input" >
<p class="mt-2 text-sn text-gray-500 dark:text-gray-300" id="fiel_input-help">PNG, JPG or GIF</p>
<textarea name="description" id="" class="mt-10 w-full border border-gray-200 rounded-xllayout" 
rows="5" placeholder="{{__('Write a description...')}}">{{$post->description?? ""}}</textarea>
