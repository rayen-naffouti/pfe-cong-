import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  form!: FormGroup;
  files :any;

  constructor(
    private formBuilder: FormBuilder,
    private http: HttpClient,
    private router: Router
  ) {
  }

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      name: '',
      email: '',
      password: '',
      image: [null],
      PERS_MAT_ACT: '',
      PERS_NOM: '',
      PERS_PRENOM: '',
      PERS_DATE_NAIS: '',
      PERS_SEX_X: '',
      PERS_NATURAGENT_93: ''

    });
  
}
get f(){
  return this.form.controls;
}

uploadImage(event) {
  this.files = event.target.files[0];
  console.log(this.files)
}

  submit(): void { 
    const formData = new FormData();
    formData.append("image",this.files,this.files.name);
    formData.append("PERS_MAT_ACT",this.form.controls['PERS_MAT_ACT'].value);
    formData.append("PERS_NOM",this.form.controls['PERS_NOM'].value);
    formData.append("PERS_PRENOM",this.form.controls['PERS_PRENOM'].value);
    formData.append("PERS_DATE_NAIS",this.form.controls['PERS_DATE_NAIS'].value);
    formData.append("PERS_SEX_X",this.form.controls['PERS_SEX_X'].value);
    formData.append("PERS_NATURAGENT_93",this.form.controls['PERS_NATURAGENT_93'].value);
    formData.append("name",this.form.controls['name'].value);
    formData.append("email",this.form.controls['email'].value);
    formData.append("password",this.form.controls['password'].value);
    // console.log(formData)
     this.http.post('http://localhost:8000/api/register',formData)
         .subscribe(() => this.router.navigate(['/dashboard']));
    
  }

}
