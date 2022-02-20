import { Injectable } from '@angular/core';
import {Users} from "./users";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {catchError, Observable, tap, of} from "rxjs";
import {MessageService} from "./message.service";

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private users = 'http://127.0.0.1:8000/users';

  httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(private http: HttpClient, private messageService: MessageService) { }

  getUsers(): Observable<Users[]> {
    return this.http.get<Users[]>(this.users)
      .pipe(
        tap(_ => console.log('aa')),
        catchError(this.handleError<Users[]>('getUsers', []))
      );
  }

  private log(message: string) {
    this.messageService.add(`UserService: ${message}`);
  }

  private handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {

      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);

      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }
}
