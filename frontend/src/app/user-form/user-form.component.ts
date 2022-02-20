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
  @ViewChild('deleteSwal') public readonly deleteSwal!: SwalComponent;

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

    Swal.fire('Hey there!');

    this.userService.store(data)
      .subscribe({
                  next: (res:any) => {
                      console.log(res);

                  },
                  error: (e:any) => console.error(e)
              });
  }

}
