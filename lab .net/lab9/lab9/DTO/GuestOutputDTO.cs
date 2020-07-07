using System;
using lab9.Models;

namespace lab9.DTO
{
    public class GuestOutputDTO
    {
        public GuestOutputDTO(Guest guest)
        {
            this.Title = guest.Title;
            this.Comment = guest.Comment;
            this.Date = guest.Date;
            this.Id = guest.Id;
            this.Author = new UserOutputDTO(guest.Author);
        }

        public int Id { get; set; }
        public string Title { get; set; }
        public string Comment { get; set; }
        public DateTime Date { get; }

        public UserOutputDTO Author { get; set; }
    }
}
