import { Component, OnInit, Output, EventEmitter, ViewChild } from '@angular/core';
import {ModalDismissReasons, NgbModal} from "@ng-bootstrap/ng-bootstrap";
import {NgForm} from '@angular/forms';
import {UserService} from "../user.service";
import { SwalComponent } from '@sweetalert2/ngx-sweetalert2';
import Swal from 'sweetalert2/dist/sweetalert2.all.js';

@Component({
  selector: 'app-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.css']
})
export class UserFormComponent implements OnInit {
  closeResult = '';

  show: any = false;

  @Output() notify?: EventEmitter <boolean> = new EventEmitter <boolean>();

  constructor(private modalService:NgbModal, private userService: UserService) { }

  open(content: any) {
    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
  }

  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return `with: ${reason}`;
    }
  }  

  ngOnInit(): void {
  }

  onClickSubmit(data :any) {

    this.show = true;

    Swal.fire('Wait a few seconds');

    this.userService.store(data)
      .subscribe(
        (next: any) => {
            Swal.fire(next.message);
            this.show = false;
        },
        error => {
          Swal.fire(this.getMessageError(error.error.message));
          this.show = false;
        });
  }

  getMessageError(error :any) {
      var msg = "";
      for (let key in error) 
      {
          var msgLocal = error[key].join(',') + '\n';           
          msg += msgLocal;
      }
      return msg;
  }
}
