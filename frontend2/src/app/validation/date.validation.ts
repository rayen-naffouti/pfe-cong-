import { FormGroup, ValidatorFn } from "@angular/forms";

export function datelessthan(firstdatefield: string,seconddatefield:string):ValidatorFn{
    return (form: FormGroup):{ [key:string]: boolean } | null =>{
        const firstdatevalue = form.get(firstdatefield).value;
        const seconddatevalue = form.get(seconddatefield).value;

        if (!firstdatevalue ||!seconddatevalue){
            return { missing: true};
        }
        const firstdate = new Date(firstdatevalue);
        const seconddate = new Date(seconddatevalue);

        if (firstdate.getTime() >= seconddate.getTime()){
            const err = { datelessthan:true};
            form.get(firstdatefield).setErrors(err);
            return err;
        }else {
            const datelesserr = form.get(firstdatefield).hasError('datelessthan');
            if (datelesserr){
                delete form.get(firstdatefield).errors['datelessthan'];
                form.get(firstdatefield).updateValueAndValidity();
            }
            return { missing: false};
        }
    }

}