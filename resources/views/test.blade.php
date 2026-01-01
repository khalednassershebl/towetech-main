 <!-- أضف dropdown الأقسام هنا -->
 <li class="nav-item dropdown">
     <a class="nav-link" href="#" id="systemsDropdown" role="button" data-bs-toggle="dropdown">
         {{ ($locale ?? 'ar') == 'en' ? 'Departments' : 'الأقسام' }}
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="margin-right: 5px;">
             <path fill="currentColor" d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
         </svg>
     </a>

     <ul class="dropdown-menu" aria-labelledby="systemsDropdown">
         @foreach($categories as $category)
         <li>
             <a class="dropdown-item"
                 href="{{ route('categories.show', $category->slug) }}">
                 {{ ($locale ?? 'ar') == 'en' ? $category->name_en : $category->name }}
             </a>

         </li>
         @endforeach
     </ul>
 </li>